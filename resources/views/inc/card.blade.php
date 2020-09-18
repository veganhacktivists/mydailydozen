<div class="col-12 col-md-4 mb-3">
  <div class="w-100 bg-white rounded-lg d-flex flex-row p-4">
    <div class="mr-2">
      <img class="rounded-lg" src="{{ asset($item['icon_location']) }}" alt=""/>
    </div>
    <div class="d-flex flex-column w-100">
      {{ $item['name'] }}
      <span class="text-muted">subheading</span>
      <div class="w-100 text-right text-muted ">

        <div x-data="countCheck()" x-init="count = checkboxCount('{{ $item['name'] }}')">
          <span x-text="count"></span> / {{ $item['per_day'] }}

          @for ($i = 0; $i < $item['per_day']; $i++)
            <input type="checkbox" id="{{ $item['name'].$i }}" @click="clickCount($event, '{{$item['name']}}')">
          @endfor
        </div>
      </div>
    </div>
  </div>
</div>
