<div>
    <button wire:click="decrement">-</button>
    <span>{{ $counter }}</span>
    <button wire:click="increment">+</button>
</div>

{{--

ALPINE

<div x-data="{
    counter:0,
    decrement(){
        this.counter--
    },
    increment(){
        this.counter++
    }
}">
    <button @click="decrement">-</button>
    <span x-html="counter"></span>
    <button @click="increment">+</button>
</div>
--}}
