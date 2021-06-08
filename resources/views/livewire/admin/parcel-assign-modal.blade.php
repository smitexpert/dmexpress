<div class="row">
    <div class="col-md-12">
        <form wire:submit.prevent="submit">
            <input type="hidden" wire:model="parcel_id">
            <div class="row">
              <div class="col-md-6">
                <label for="">Tracking ID</label>
                <div class="form-group">
                  <input type="text" class="form-control" wire:model="tracking" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Select Hero</label>
                <div class="form-group">
                  <select wire:model="hero_id" id="" class="form-control">
                    <option value="">SELECT HERO</option>
                    @foreach ($heros as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->phone }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="pull-right">
                  @if (($tracking != "") && ($hero_id != ""))
                    <button class="btn btn-success">SAVE</button>
                  @endif
                </div>
              </div>
            </div>
        </form>
    </div>
</div>