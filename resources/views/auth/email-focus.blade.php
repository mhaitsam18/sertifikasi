<div class="input-group-prepend">
    <span class="input-group-text">
        <i class="icon-dual" data-feather="mail"></i>
    </span>
</div>
<input type="text" class="form-control email-input" id="email" autofocus value="{{ $email_focus }}">
<div class="input-group-prepend">
    <span class="input-group-text">
        @student.telkomuniversity.ac.id
    </span>
</div>
<input type="hidden" name="email" id="email-hidden" value="{{ $email }}">
@include('auth.layouts.script')
<script>
    $(".email-input").on('blur', function() {
        const email = $(this).val();
        $.ajax({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url: 'registrasi/email-blur',
            type: "post",
            data: {
                'email': email
            },
            success: function(data) {
                $(".email-text").html(data);
            }
        });

    });
</script>