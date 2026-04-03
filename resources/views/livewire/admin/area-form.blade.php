<div class="row">
    @if($step==1 || $step==2)
    <div class="col-12">
        <div class="form-group">
            <label for="title_one">Division</label>
            <select name="division_id" class="form-control" id="division_id" wire:change="changeDiv($event.target.value)"  wire:model="division_id">
                <option value="0">Select a parent name</option>
                @foreach($divisions as $division)
                    <option
                        value="{{ $division->id }}" {{ ($division->id==$division_id) ? 'selected':'' }}>{{ $division->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    @endif
    @if($step==2)
    <div class="col-12">
        <div class="form-group">
            <label for="title_one">Districts</label>
            <select name="district_id" class="form-control" id="district_id" wire:click="selectDistrict($event.target.value)" wire:model="district_id">
                <option value=" ">Select a parent name</option>
                @foreach($districts as $district)
                    <option
                        value="{{ $district->id }}" {{ ($district->id==$district_id) ? 'selected':'' }}>{{ $district->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
        @endif
</div>

