@extends('layouts.defaultWithSidebar')

@section('content')
  <style>

    * {
    .border-radius(0) !important;
    }

    #field {
      margin-bottom:20px;
    }

  </style>
  <div class="container">
    <div class="row">
      <div class="col-xs-2 col-sm-2 col-md-2"></div>
      <div class="col-xs-8 col-sm-8 col-md-8">
        <h1>Edit a Quote</h1>
        <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Add Products Descriptions and Prices</div>
          <div class="panel-body">

          <form class="form-inline" action="../createQuote/{{$orderId}}" method="POST">
            {{csrf_field()}}


            @foreach($products as $product)

              @php
                $name = $product->name;
                $description = $product->description;
                $price = $product->price / 100;
              @endphp

              @if($loop->first)
                <div class="input-group control-group after-add-more-1">
                <input type="text" name="addmore[]" class="form-control" placeholder="Product/Service" value="{{$name}}">
                <input type="text" name="addmore[]" class="form-control" placeholder="Description" value="{{$description}}">
              <span class="input-group-addon">$</span>
              <input type="number" step="0.01" min="0" name="addmore[]" class="form-control" placeholder="Price" value="{{$price}}">
                  <div class="input-group-btn"> 
                    <button class="btn btn-success add-more" type="button"><i class="btn-success"></i>Add</button>
                  </div>
                </div>

              @else

              <div class="input-group control-group after-add-more-2">
                <input type="text" name="addmore[]" class="form-control" placeholder="Product/Service" value="{{$name}}">
                <input type="text" name="addmore[]" class="form-control" placeholder="Description" value="{{$description}}">
              <span class="input-group-addon">$</span>
              <input type="number" step="0.01" min="0" name="addmore[]" class="form-control" placeholder="Price" value="{{$price}}">
              <div class="input-group-btn"> 
                <button class="btn btn-danger remove" type="button"><i class="btn-danger"></i>Remove</button>
              </div>
            </div>
            @endif
            @endforeach
            <br></br>
            <input class="btn btn-primary" type="submit" value="Submit"></input>
          </form>


          <div hidden class="copy hide">
            <div class="control-group input-group" style="margin-top:10px">
              <input type="text" name="addmore[]" class="form-control" placeholder="Product/Service">
              <input type="text" name="addmore[]" class="form-control" placeholder="Description">
              <span class="input-group-addon">$</span>
              <input type="number" step="0.01" min="0" name="addmore[]" class="form-control" placeholder="Price">
              <div class="input-group-btn"> 
                <button class="btn btn-danger remove" type="button"><i class="btn-danger"></i> Remove</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xs-2 col-sm-2 col-md-2"></div>
  </div>
</div>
               
@endsection

@section('foot')
<script>
    $(document).ready(function() {

      $(".add-more").click(function(){ 
          var html = $(".copy").html();

          if($(".after-add-more-2").length){
            $(".after-add-more-2").after(html);
          } else {
            $(".after-add-more-1").after(html);
          }
          
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });

</script>
@endsection