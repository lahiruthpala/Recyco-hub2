const editor = new EditorJS({
    holder: 'editorjs',
    tools: {
        header: {
            class: Header,
            config: {
                placeholder: 'Enter a header'
            }
        },
        raw: {
            class: RawTool
        },
        simpleImage: {
            class: SimpleImage
        },
        image: {
            class: ImageTool,
            endpoints: {
                byUrl: ROOT + "Partner/uploadImage",
            },
        },
        checklist: {
            class: Checklist,
        },
        list: {
            class: List
        },
        quote: {
            class: Quote
        },
    }
});
// Save data when the user clicks the "Save" button
function saveData(e) {
    e.preventDefault();
    console.log("jsdbhvkjdhv")
    editor.save()
        .then((outputData) => {
            // Create a form element
            const form = document.getElementById('Article');
            // Create an input element to hold the outputData
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'Data';
            input.value = JSON.stringify(outputData);

            // Append the input element to the form
            form.appendChild(input);

            // Submit the form
            form.submit();
        })
        .catch((error) => {
            console.log('Saving failed: ', error);
        });
}