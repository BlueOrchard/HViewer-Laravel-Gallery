<form class="upload-form" method="post" action="/add-manga" enctype="multipart/form-data">
    {{ csrf_field() }}

    <h4>Name and Chapter</h4>
    <input name="name" placeholder="Name and Chapter">

    <h4>Description</h4>
    <textarea name="description" placeholder="Description"></textarea>

    <h4>Tags</h4>
    <input name="tags" placeholder="Tags">

    <h4>Artists</h4>
    <input name="artists" placeholder="Artists">
    
    <h4>Languages</h4>
    <input name="languages" placeholder="Languages">

    <h4>Zip File for Gallery</h4>
    <input name="gallery" type="file">

    <button type="submit">Submit</button>
</form>