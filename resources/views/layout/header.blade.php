<div class='head-btns-div'>
<div class='container'>
<div class='d-flex'>
<ul>
<li><a href='{{url("/list-categorie")}}'>Categorie</a></li>
<li><a href='{{url("/list-subcategorie")}}'>Sub Categorie</a></li>
<li><a href='{{url("/list-items")}}'>Items</a></li>
</ul>
<div class='logout-btn'>
<form method='post' action='{{url("/logout")}}'>
@csrf
<button type='submit'>
Logout
</button>
</form>
</div>
</div>
</div>
</div>

