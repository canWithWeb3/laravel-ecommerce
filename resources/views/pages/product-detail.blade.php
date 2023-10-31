@extends("layouts.app")

@section("content")
    <div class="container my-5">

        <div class="row">
            <div class="col-md-3">
                <img src="{{ $product->image }}" alt="" class="img-fluid rounded-4">
            </div>

            <div class="col-md-9">
                <h1>{{ $product->name }}</h1>
                <p>{!! $product->description !!}</p>

                <form action="{{ url("/addToCart/".$product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Sepete Ekle</button>
                </form>
            </div>
        </div>

    </div>
@endsection

@section("scripts")
<script>
    $(document).ready(function(){
        // add to cart
        $("#addToCartBtn").click(function(){
            $(this).attr("disabled", true)

            $.ajax({
                type: "POST",
                url: "/addToCart/{{ $product->id }}",
                success: function(res){
                    $("#addToCartBtn").attr("disabled", false)
                    
                    if(res.alert_status == "success")
                        return toastr.success(res.alert_message)

                    return toastr.error(res.alert_message)
                },
                error: function(err){
                    console.log("error")
                }
            })

        })
    })
</script>
@endsection