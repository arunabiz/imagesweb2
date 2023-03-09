<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<form action="/images" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name"><br><br>
    <label for="image">Image:</label>
    <input type="file" name="image" id="image"><br><br>
    <input type="submit" value="Submit">
</form>

</html>
