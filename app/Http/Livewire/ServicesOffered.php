<?php

namespace App\Http\Livewire;

use App\Models\OfferedServices;
use App\Models\Service;
use Livewire\Component;

class ServicesOffered extends Component
{
    public $name, $notes;
    public $discount_value = 0;
    public $taxes = 15;
    public $GroupsItems = [];
    public $services = [];
    public $show_table = true;
    public $ServiceSaved = false;
    public $ServiceUpdated = false;
    public $updateMode = false;
    public $group_id;


    // validation Form
    public function rules()
    {
        if (is_null($this->group_id)) {
            return [
                'name' => 'required|min:3|unique:servicesoffered,name',
                'discount_value' => 'required|numeric|gt:0',
                'taxes' => 'required|numeric|gt:0',
                "GroupsItems"    => "required|array|min:1",
                'GroupsItems.*.service_id' => 'required|numeric|distinct|exists:services,id',
            ];
        } else {
            return [
                'name' => 'required|min:3|unique:servicesoffered,name,' . $this->group_id,
                'discount_value' => 'required|numeric|gt:0',
                'taxes' => 'required|numeric|gt:0',
                "GroupsItems"    => "required|array|min:1",
                'GroupsItems.*.service_id' => 'required|numeric|distinct|exists:services,id',
            ];
        }
    }

    public function mount()
    {
        $this->services = Service::all();
    }


    public function render()
    {
        $before_discount = 0;
        foreach ($this->GroupsItems as  $groupItem) {
            if ($groupItem['is_saved']) {

                $before_discount += $groupItem['service_price'];
            }
        }

        $subtotal = $before_discount - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
        $total = $subtotal * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
        $groups = OfferedServices::all();
        return view('livewire.ServicesOffered.create', [
            'groups' => $groups,
            'subtotal' => $subtotal,
            'total' => $total
        ]);
    }


    public function addService()
    {
        foreach ($this->GroupsItems as $key => $groupItem) {
            if (!$groupItem['is_saved']) {
                $this->addError('GroupsItems.' . $key, 'This service must be saved before creating a new service.');
                return;
            }
        }
        $this->GroupsItems[] = [
            'service_id' => '',
            'service_name' => '',
            'service_price' => 0,
            'is_saved' => false,
        ];
    }
    public function saveService($index)
    {
        // $this->resetErrorBag();

        $product = $this->services[$index]->find($this->GroupsItems[$index]['service_id']);
        if (!$product) {
            $this->addError('GroupsItems.' . $index, 'The selected service is invalid.');
            return;
        }
        $this->GroupsItems[$index]['service_name'] = $product->name;
        $this->GroupsItems[$index]['service_price'] = $product->price;
        $this->GroupsItems[$index]['is_saved'] = true;
        $this->ServiceSaved = true;
    }

    public function removeService($index)
    {
        unset($this->GroupsItems[$index]);
        $this->GroupsItems = array_values($this->GroupsItems);
    }

    // insert && update in database :
    public function store()
    {

        // update
        if ($this->updateMode) {
            $Groups = OfferedServices::find($this->group_id);
            $this->validate();

            $before_discount = 0;
            foreach ($this->GroupsItems as $key => $groupItem) {
                if ($groupItem['is_saved']) {
                    $before_discount += $groupItem['service_price'];
                } else {
                    $this->addError('GroupsItems.' . $key, 'This service must be saved before creating a new service.');
                    return;
                }
            }

            $subtotal = $before_discount - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
            $total = $subtotal * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
            $Groups->name =  $this->name;
            $Groups->notes = $this->notes;
            $Groups->before_discount = $before_discount;
            $Groups->discount_value = $this->discount_value;
            $Groups->after_discount = $subtotal;
            $Groups->taxes = $this->taxes;
            $Groups->total = $total;
            $Groups->save();

            $Groups->OfferedServices()->detach();
            foreach ($this->GroupsItems as $GroupsItem) {
                $Groups->OfferedServices()->attach($GroupsItem['service_id']);
            }

            return redirect()->route('servicesOffered.layout')->with('edit', 'msg');
        } else {

            // insert
            $this->validate();

            $before_discount = 0;
            foreach ($this->GroupsItems as $key => $groupItem) {

                if ($groupItem['is_saved']) {

                    $before_discount += $groupItem['service_price'];
                } else {
                    $this->addError('GroupsItems.' . $key, 'This service must be saved before creating a new service.');
                    return;
                }
            }

            $subtotal = $before_discount - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
            $total = $subtotal * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);


            $group = new OfferedServices();
            $group->name =  $this->name;
            $group->notes = $this->notes;
            $group->before_discount = $before_discount;
            $group->discount_value = $this->discount_value;
            $group->after_discount = $subtotal;
            $group->taxes = $this->taxes;
            $group->total = $total;
            $group->save();

            // insert to pivot_servicesoffered table
            foreach ($this->GroupsItems as $GroupsItem) {
                $group->OfferedServices()->attach($GroupsItem['service_id']);
            }
            return redirect()->route('servicesOffered.layout')->with('add', 'msg');
        }
    }
    public function show_form_add()
    {
        $this->show_table = false;
    }

    public function delete($id)
    {
        $group = OfferedServices::find($id);
        $group->delete();
        return redirect()->route('servicesOffered.layout')->with('delete', 'msg');
    }
    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $group = OfferedServices::find($id);
        $this->group_id = $id;

        $this->reset('GroupsItems', 'name', 'notes');
        $this->name = $group->name;
        $this->notes = $group->notes;

        $this->discount_value = intval($group->discount_value);
        $this->taxes = intval($group->taxes);
        $this->ServiceSaved = false;

        foreach ($group->OfferedServices as $serviceGroup) {
            $this->GroupsItems[] = [
                'service_id' => $serviceGroup->id,
                'is_saved' => true,
                'service_name' => $serviceGroup->name,
                'service_price' => $serviceGroup->price
            ];
        }
    }
}
