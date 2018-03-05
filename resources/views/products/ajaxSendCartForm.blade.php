
function sendItemData(event){
  event.preventDefault();
  $.ajax({
    url: '{{ route("api.cart.add") }}',
    type: 'POST',
    data: $(event.target).serialize(),
    success:function(response){
      alert(response.message);
    },
    error:function(error){
      alert(error.responseJSON.error);
      console.log(error);
    }
  });

}
