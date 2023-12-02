<div class="list-group list-group-flush">
    @foreach ($widgets as $key => $widget)
        <div class="list-group-item p-2">
            <div class="row">
                <div class="col-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-dot" width="44"
                        height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6f32be" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    </svg>
                </div>
                <div class="col-auto">
                    <label class="form-check">
                        <input class="form-check-input" wire:change="changeWidget($event.target.value)"
                            value="{{ $key }}" type="checkbox"
                            @if ($widget->isActive()) checked="" @endif>
                        <span class="form-check-label"> {{ $widget->getName() }}</span>
                    </label>
                </div>
            </div>
        </div>
    @endforeach
</div>
