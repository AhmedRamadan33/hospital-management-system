<div>
    @if($message === true)
        <script>
            alert('The booking details have been sent to the hospital and the appointment information will be sent via phone and email.')
            location.reload()
        </script>
    @endif
    <form wire:submit.prevent="store">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="text" name="username" wire:model="name" placeholder="name" class="@error('name') is-invalid @enderror">
                @error('name')<span class="error text-danger">{{ $message }}</span>@enderror
                <span class="icon fa fa-user"></span>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="email" name="email" wire:model="email" placeholder="email" class="@error('email') is-invalid @enderror">
                @error('email')<span class="error text-danger">{{ $message }}</span>@enderror

                <span class="icon fa fa-envelope"></span>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">Section</label>
                <select class="form-select @error('section') is-invalid @enderror" name="section" wire:model="section" id="exampleFormControlSelect1" >
                    <option>-- Choose --</option>
                    @foreach($sections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                </select>
                @error('section')<span class="error text-danger">{{ $message }}</span>@enderror

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">Doctor Name</label><span class="small text-danger"> Must Choose The Section Firstly</span>
                <select name="doctor" wire:model="doctor" class="form-select @error('doctor') is-invalid @enderror" id="exampleFormControlSelect1">
                    <option>-- Choose --</option>
                    @foreach($doctors as $doctor)
                        <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                    @endforeach
                </select>
                @error('doctor')<span class="error text-danger">{{ $message }}</span>@enderror

            </div>

            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <input type="tel" name="phone" wire:model="phone" placeholder="phone" class="@error('phone') is-invalid @enderror">
                @error('phone')<span class="error text-danger">{{ $message }}</span>@enderror

                <span class="icon fas fa-phone"></span>
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <textarea name="notes" wire:model="notes" placeholder="notes" class="@error('notes') is-invalid @enderror"></textarea>
                @error('notes')<span class="error text-danger">{{ $message }}</span>@enderror

            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="theme-btn btn-style-two" type="submit" name="submit-form">
                    <span class="txt">submit</span></button>
            </div>
        </div>
    </form>
</div>
