<div>
    <form action="/request/ConfirmEndCall/" method="post">
        <select class="form-select" name="reason" aria-label="Default select example" required>
            <option selected>Причины</option>
            <option>Причина - дорогая услуга.</option>
            <option>Причина - плохое качество</option>
            <option>Причина - низкая скорость</option>
        </select>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Дополнительный комментарий:</label>
            <textarea name="commit" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Отправить">
    </form>
</div>