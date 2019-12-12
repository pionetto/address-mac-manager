@csrf
<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" value="{{ $device->name ?? null }}">
</div>

<div class="form-group">
    <label>Tipo:</label>
    <input type="text" name="type" class="form-control" value="{{ $device->type ?? null }}">
</div>

<div class="form-group">
    <label>Endereço MAC:</label>
    <input type="text" name="device" class="form-control" value="{{ $device->device ?? null }}">
</div>

<div class="form-group">
    <label>Status:</label>
    <input type="checkbox" name="enable" class="form-control" {{ !empty($device->enable) ? "checked" : false }}>
</div>