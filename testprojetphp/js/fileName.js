    function updateFileName(input) {
        const fileName = input.files[0].name;
        document.getElementById('file-name').textContent = fileName;
    }
