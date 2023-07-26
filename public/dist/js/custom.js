//hide alert message after sometime
setTimeout(function(){
    $('.alert_messages').fadeOut();
}, 3000);


//sweet alert2
$('.show_sweetalert').click(function(event) {
    var form =  $(this).closest("form");
    event.preventDefault();
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "It will gone forever",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
});
