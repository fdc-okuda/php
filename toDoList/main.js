

    $(function(){
        $('.checkbox').on('change',function(){
        $(this).closest('form').submit();
    })});

    function validateForm() {
        var x = document.forms["myForm"]["text"].value;
        if (x == "" || x == null || x == (/^[ 　\r\n\t]*$/)){
            alert("Fill in the Form");
            return false;
        }
    }

