<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="upload_file" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
    <!-- Name of input element determines name in $_FILES array -->
    Enviar este archivo: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>