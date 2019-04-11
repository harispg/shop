@extends('master')

@section('content')
<div class="content g-py-100 g-px-100">
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Date Created</th>
        <th>Date updated</th>
        <th class="hidden-sm">Items</th>
        <th>Sub Total</th>
        <th>Discount achieved</th>
        <th>Total</th>
        <th>Status</th>

      </tr>
    </thead>

    <tbody>
    	@foreach($user->orders()->latest()->get() as $order)
      <tr>
        <td>{{$order->created_at->diffForHumans()}}</td>
        <td>{{$order->updated_at->diffForHumans()}}</td>
        <td class="hidden-sm">{{$order->items->count()}}</td>
        <td>{{$order->subTotal()}}</td>
        <td>{{$order->discount()}}</td>
        <td>{{$order->orderTotal()}}</td>
        <td>
          <span class="u-label @switch($order->status->name)
              @case("submited")
                  u-label-success
                  @break
              @case("creating")
                  u-label-info
                  @break
              @case("denied")
                  u-label-danger
                  @break
              @default
                  u-label-warning
          @endswitch
           g-color-white">{{$order->status->name}}</span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection