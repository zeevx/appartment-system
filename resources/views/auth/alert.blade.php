
@if (session('success'))
    <br>
    <div class="m-5 align-items-center alert alert-success  alert-dismissible fade show" id="alert" role="alert">
        <button type="button" id="close" class="close" data-dismiss="alert">x</button>
        <li>
            {{ session('success') }}
        </li>
    </div>
@endif

@if (session('failure'))
    <br>
    <div class="m-5 align-items-center alert alert-danger alert-dismissible fade show" id="alert" role="alert">
        <button type="button" id="close" class="close" data-dismiss="alert">x</button>
        <li>
            {{ session('failure') }}
        </li>
    </div>
@endif
<script>
    setTimeout("document.getElementById(\"close\").click()", 5000);
</script>
