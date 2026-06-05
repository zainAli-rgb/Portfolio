<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Product</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            background: #f7f7f7;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: 500;
            display: block;
            margin-bottom: 6px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .dynamic-box {
            margin-top: 20px;
            padding: 15px;
            border: 1px dashed #ccc;
            border-radius: 8px;
        }

        .btn {
            background: black;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 6px;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Create Product</h2>

        <form id="productForm" enctype="multipart/form-data">

            <!-- FIXED FIELDS -->
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description"></textarea>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price">
            </div>

            <!-- CATEGORY -->
            <div class="form-group">
                <label>Category</label>
                <select id="categorySelect" name="category_id" required>
                    <option value="">Select Category</option>
                </select>
            </div>

            <!-- DYNAMIC FIELDS -->
            <div id="dynamicFields" class="dynamic-box">
                <p>Select category to load attributes...</p>
            </div>
            <!-- PRODUCT IMAGES -->
            <div class="form-group">
                <label>Product Images</label>
                <input type="file" name="images[]" multiple accept="image/*">
                <small style="color:#777;">You can upload multiple images</small>
            </div>
            <button class="btn" type="submit">Create Product</button>

        </form>

    </div>

    <script>
        let categoriesData = [];

        document.addEventListener("DOMContentLoaded", async () => {

            const res = await fetch("/api/business/1/product-form-data");
            const data = await res.json();

            categoriesData = data.categories;

            const categorySelect = document.getElementById("categorySelect");

            categoriesData.forEach(cat => {
                categorySelect.innerHTML += `
            <option value="${cat.id}">${cat.name}</option>
        `;
            });

            categorySelect.addEventListener("change", function() {

                const selectedId = this.value;

                const category = categoriesData.find(c => c.id == selectedId);

                renderFields(category ? category.fields : []);
            });
        });

        function renderFields(fields) {

            const box = document.getElementById("dynamicFields");
            box.innerHTML = "";

            if (!fields || fields.length === 0) {
                box.innerHTML = "<p>No extra attributes for this category</p>";
                return;
            }

            fields.forEach(field => {

                let input = "";

                if (field.field_type === "text") {

                    input =
                        `<input type="text" name="fields[${field.slug}]" ${field.is_required ? 'required' : ''}>`;

                } else if (field.field_type === "number") {

                    input =
                        `<input type="number" name="fields[${field.slug}]" ${field.is_required ? 'required' : ''}>`;

                } else if (field.field_type === "select") {

                    let optionsHtml = `<option value="">Select ${field.name}</option>`;

                    if (field.options && field.options.length > 0) {
                        field.options.forEach(opt => {
                            optionsHtml += `
                        <option value="${opt.value}">
                            ${opt.label ?? opt.value}
                        </option>
                    `;
                        });
                    }

                    input = `
                <select name="fields[${field.slug}]" ${field.is_required ? 'required' : ''}>
                    ${optionsHtml}
                </select>
            `;
                } else if (field.field_type === "checkbox") {

                    input = `<input type="checkbox" name="fields[${field.slug}]" value="1">`;

                } else if (field.field_type === "file") {

                    input = `<input type="file" name="fields[${field.slug}]">`;
                }

                box.innerHTML += `
            <div class="form-group">
                <label>${field.name}</label>
                ${input}
            </div>
        `;
            });
        }
        document.getElementById("productForm").addEventListener("submit", async function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            const res = await fetch("/products", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            });

            const data = await res.json();
            console.log(data);
        });
    </script>

</body>

</html>
