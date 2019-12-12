@csrf
<input type="hidden" name="update" value="update">

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" value="{{ $clients->name ?? null }}">
</div>

<div class="form-group">
    <label>Matrícula:</label>
    <input type="text" name="regist" class="form-control" value="{{ $clients->regist ?? null }}">
</div>

<div class="form-group">
    <label>Secretaria:</label>
    <input type="text" name="secretary" class="form-control" value="{{ $clients->secretary ?? null }}">
</div>

<div class="form-group">
    <label>Lotação:</label>
    <input type="text" name="workplace" class="form-control" value="{{ $clients->workplace ?? null }}">
</div>