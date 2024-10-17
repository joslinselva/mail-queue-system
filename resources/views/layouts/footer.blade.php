
 <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Email Notification System</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    

    <script>
    $(document).ready(function() {
    $('#emailForm').validate({
        ignore: [],
        errorPlacement: function(error, element) {
            // Display the error message next to the input
            error.appendTo(element.siblings('.invalid-feedback'));
            element.addClass('is-invalid');
        },
        success: function(label, element) {
            // Remove is-invalid class from the element when valid
            $(element).removeClass('is-invalid');
            // Remove the error message
            $(element).siblings('.invalid-feedback').empty(); // Clear the error message
        },
        submitHandler: function(form) {
            const emailData = $(form).serialize();
            $.ajax({
                url: '/send-email',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: emailData, 
                success: function(response) {
                    $('#responseMessage').removeClass('alert alert-danger').empty(); 
                    $('#responseMessage').addClass('alert alert-success').text(response.message);
                    $('.form-control').removeClass('is-invalid'); 
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $('#responseMessage').removeClass('alert alert-success').empty(); 
                        $('.form-control').removeClass('is-invalid'); 
                        for (const [key, value] of Object.entries(errors)) {
                            $('#' + key).addClass('is-invalid'); 
                            $('#responseMessage').append(`<div>${value.join(', ')}</div>`);
                        }
                        $('#responseMessage').addClass('alert alert-danger');
                    } else {
                        $('#responseMessage').removeClass('alert alert-success').empty(); 
                        $('#responseMessage').addClass('alert alert-danger').text('Try sending email again!');
                    }
                    console.error('Error:', xhr);
                }
            });
        }
    });
});
</script>
</body>
</html>