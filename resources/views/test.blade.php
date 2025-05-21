<form method="POST" action="{{ route('form.store') }}" class="space-y-4">
    @csrf
    <div id="fields" class="space-y-4">
        <div class="flex gap-2">
            <input type="text" name="fields[0][key]" placeholder="Field Label" class="border px-2 py-1 rounded w-1/2">
            <input type="text" name="fields[0][value]" placeholder="Field Value" class="border px-2 py-1 rounded w-1/2">
        </div>
    </div>

    <button type="button" onclick="addField()" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Field</button>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Submit</button>
</form>

<script>
    let index = 1;
    function addField() {
        const container = document.getElementById('fields');
        container.insertAdjacentHTML('beforeend', `
        <div class="flex gap-2 mt-2">
            <input type="text" name="fields[${index}][key]" placeholder="Field Label" class="border px-2 py-1 rounded w-1/2">
            <input type="text" name="fields[${index}][value]" placeholder="Field Value" class="border px-2 py-1 rounded w-1/2">
        </div>
    `);
        index++;
    }
</script>
