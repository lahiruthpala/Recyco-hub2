<!DOCTYPE html>
<html>

<head>
    <title>EditorJS Example</title>
</head>

<body>
    <div id="editorjs"></div>
    <button id="save-button">Save</button>
    <button id="load-button">Load</button>
    <textarea id="saved-data"></textarea>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>
    <script>
        const editor = new EditorJS({
            holder: 'editorjs',
            tools: {
                header: {
                    class: Header,
                    inlineToolbar: true,
                },
                list: {
                    class: List,
                    inlineToolbar: true,
                },
                code: {
                    class: CodeTool,
                    config: {
                        additionalLanguages: [
                            { name: 'Bicep', code: 'bicep' },
                        ],
                    },
                },
            },
        });
        var temp = "";
        // Save data when the user clicks the "Save" button
        document.getElementById('save-button').addEventListener('click', () => {
            editor.save().then((savedData) => {
                // Display the saved data in the textarea
                temp = savedData;
                console.log(temp);
            });
        });
        document.getElementById('load-button').addEventListener('click', () => {
            // Get the saved data from a textarea or a server
            const savedData = temp;

            // Load this data into the editor
            const newEditor = new EditorJS({
                holder: 'editorjs',
                data: savedData,
            });
        });
    </script>
</body>

</html>