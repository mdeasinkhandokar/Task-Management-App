<?php
require_once 'controller/session.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload - Easin</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
        .upload-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .upload-area {
            border: 2px dashed #2196F3;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            margin: 1rem 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-area:hover {
            background: #E3F2FD;
        }

        .upload-area.dragover {
            background: #E3F2FD;
            border-color: #1976D2;
        }

        .file-input {
            display: none;
        }

        .upload-btn {
            background: #2196F3;
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1rem;
        }

        .upload-btn:hover {
            background: #1976D2;
        }

        .file-list {
            margin-top: 1rem;
        }

        .file-item {
            background: #f5f5f5;
            padding: 0.5rem 1rem;
            margin: 0.5rem 0;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .back-to-dashboard {
            display: inline-block;
            margin-bottom: 1rem;
            color: #2196F3;
            text-decoration: none;
            font-weight: 500;
        }

        .back-to-dashboard:hover {
            text-decoration: underline;
        }

        #upload-status {
            margin-top: 1rem;
            padding: 1rem;
            border-radius: 5px;
            display: none;
        }

        .success {
            background: #E8F5E9;
            color: #2E7D32;
        }

        .error {
            background: #FFEBEE;
            color: #C62828;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <a href="dashboard.php" class="back-to-dashboard">← Back to Dashboard</a>
        <h1>File Upload</h1>
        
        <form id="upload-form" action="controller/upload_handler.php" method="post" enctype="multipart/form-data">
            <div class="upload-area" id="drop-zone">
                <p>Drag & Drop files here or click to select</p>
                <input type="file" name="file" id="file-input" class="file-input" multiple>
            </div>
            <div class="file-list" id="file-list"></div>
            <button type="submit" class="upload-btn">Upload Files</button>
        </form>
        <div id="upload-status"></div>
    </div>

    <script>
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('file-input');
        const fileList = document.getElementById('file-list');
        const uploadForm = document.getElementById('upload-form');
        const uploadStatus = document.getElementById('upload-status');

        // Handle drag and drop events
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('dragover');
        }

        function unhighlight(e) {
            dropZone.classList.remove('dragover');
        }

        dropZone.addEventListener('drop', handleDrop, false);
        dropZone.addEventListener('click', () => fileInput.click());
        fileInput.addEventListener('change', handleFiles);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles({ target: { files: files } });
        }

        function handleFiles(e) {
            const files = Array.from(e.target.files);
            fileList.innerHTML = '';
            files.forEach(file => {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                fileItem.innerHTML = `
                    <span>${file.name}</span>
                    <span>${(file.size / 1024).toFixed(1)} KB</span>
                `;
                fileList.appendChild(fileItem);
            });
        }

        uploadForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(uploadForm);

            try {
                const response = await fetch('controller/upload_handler.php', {
                    method: 'POST',
                    body: formData
                });
                const data = await response.json();
                
                showStatus(data.message, data.success ? 'success' : 'error');
                if (data.success) {
                    fileList.innerHTML = '';
                    fileInput.value = '';
                }
            } catch (error) {
                showStatus('An error occurred during upload', 'error');
                console.error('Error:', error);
            }
        });

        function showStatus(message, type) {
            uploadStatus.textContent = message;
            uploadStatus.className = type;
            uploadStatus.style.display = 'block';
            setTimeout(() => {
                uploadStatus.style.display = 'none';
            }, 5000);
        }
    </script>
</body>
</html>