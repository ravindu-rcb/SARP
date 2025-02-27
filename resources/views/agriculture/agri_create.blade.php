<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agriculture Form</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- CSRF Token for AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dropdown-label {
            font-weight: bold;
        }
        .bold-label {
            font-weight: bold;
        }
        .color-label {
            color: green;
        }
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }
        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }
        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Agriculture Form</h2>
        <form action="{{ route('agriculture.store') }}" method="POST">
            @csrf
            <!-- Crop Category and Crop Name -->
            <div class="row mt-3">
                <div class="col">
                    <div class="dropdown">
                        <label for="categoryDropdown" class="form-label dropdown-label">Crop Category</label>
                        <select id="categoryDropdown" name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            <option value="vegetables">Vegetables</option>
                            <option value="fruits">Fruits</option>
                            <option value="home_garden">Home Garden</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <label for="cropName" class="form-label bold-label">Crop Name</label>
                    <select id="cropName" name="crop_name" class="form-control" required>
                        <option value="">Select Crop Name</option>
                    </select>
                </div>
            </div>

                <!-- Crop Variety -->
                <div class="col">
                    <label for="cropVariety" class="form-label bold-label">Crop Variety</label>
                    <input type="text" class="form-control" id="cropVariety" name="crop_variety" required>
                </div>
            </div>

            <!-- Planting Date -->
            <div class="row mt-3">
                <div class="col">
                    <label for="plantingDate" class="form-label bold-label">Planting Date</label>
                    <input type="date" class="form-control" id="plantingDate" name="planting_date" required>
                </div>
            </div>
            <!-- Input -->
            <div class="row mt-3">
                <div class="col">
                    <label for="inputs" class="form-label bold-label">Inputs</label>
                    <input type="text" class="form-control" id="inputs" name="inputs" required>
                </div>
                
                  <!-- Farmer Contribution and Cost -->
                  <div class="row mt-3">
                    <div class="col">
                        Farmer or Other Contribution
                    </div>
                    <div class="card-body">
                        <div id="contribution-fields">
                            <div class="row contribution-group">
                                <div class="col-5 form-group">
                                    <label for="farmer_contribution[]">Farmer Contribution</label>
                                    <input type="text" name="farmer_contribution[]" class="form-control" required>
                                </div>
                                <div class="col-5 form-group">
                                    <label for="cost[]">Cost</label>
                                    <input type="number" step="0.01" name="cost[]" class="form-control" required>
                                </div>
                                <!-- No remove button for the first group -->
                            </div>
                        </div>
                        <button type="button" id="add-contribution" class="btn btn-primary mt-3">Add More </button>
                    </div>
                </div>
            <!-- Total Acres and Total Production -->
            <div class="row mt-3">
                <div class="col">
                    <label for="totalAcres" class="form-label bold-label">Total Number of Acres Cultivated</label>
                    <input type="number" class="form-control" id="totalAcres" name="total_acres" required>
                </div>
        
            </div>

            <!-- Total Production, Total Income, Profit for Products -->
<div class="row mt-3">
    <div class="col">
        Product Details
    </div>
    <div class="card-body">
        <div id="product-fields">
            <div class="row product-group">
                <div class="col-4 form-group">
                    <label for="product_name[]">Product Name</label>
                    <input type="text" name="product_name[]" class="form-control" required>
                </div>
                <div class="col-3 form-group">
                    <label for="total_production[]">Total Production (kg)</label>
                    <input type="number" step="0.01" name="total_production[]" class="form-control" required>
                </div>
                <div class="col-3 form-group">
                    <label for="total_income[]">Total Income</label>
                    <input type="number" step="0.01" name="total_income[]" class="form-control" required>
                </div>
                <div class="col-2 form-group">
                    <label for="profit[]">Profit</label>
                    <input type="number" step="0.01" name="profit[]" class="form-control" required>
                </div>
                <!-- No remove button for the first group -->
            </div>
        </div>
        <button type="button" id="add-product" class="btn btn-primary mt-3">Add More Product </button>
    </div>
</div>

            <!-- GN Division Name -->
            <input type="hidden" id="gnDivisionName" name="gn_division_name">

            <!-- Submit Button -->
            <div class="row mt-4">
                <div class="col text-center">
                    <input type="hidden" name="beneficiary_id" value="{{ $beneficiaryId ?? '' }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <!-- jQuery Script for CSRF Token in AJAX -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            // Fetch GN Division Name on page load if beneficiaryId is present
            var beneficiaryId = $('input[name="beneficiary_id"]').val();
            fetchGnDivisionName(beneficiaryId);

            // Define crop options for each category
            const cropOptions = {
                vegetables: [
                    { value: 'pomegranate', text: 'Pomegranate' },
                    { value: 'carrot', text: 'Carrot' },
                    { value: 'beans', text: 'Beans' }
                ],
                fruits: [
                    { value: 'apple', text: 'Apple' },
                    { value: 'orange', text: 'Orange' }
                ],
                home_garden: [
                    { value: 'anthurium', text: 'Anthurium' },
                    { value: 'orchid', text: 'Orchid' }
                ],
                others: [
                    { value: 'xxxx', text: 'XXXX' },
                    { value: 'aaaa', text: 'AAAA' }
                ]
            };

            // Handle category selection
            $('#categoryDropdown').change(function () {
                var selectedCategory = $(this).val();
                var cropNameDropdown = $('#cropName');

                // Clear previous options
                cropNameDropdown.empty().append($('<option>', {
                    value: '',
                    text: 'Select Crop Name'
                }));

                // Populate new options based on selected category
                if (selectedCategory in cropOptions) {
                    $.each(cropOptions[selectedCategory], function (index, crop) {
                        cropNameDropdown.append($('<option>', {
                            value: crop.value,
                            text: crop.text
                        }));
                    });
                }
            });
        });

        // Function to fetch the GN Division Name
        function fetchGnDivisionName(beneficiaryId) {
            if (beneficiaryId) {
                $.ajax({
                    url: '/get-gn-division-name/' + beneficiaryId, // URL to fetch GN Division Name
                    method: 'GET',
                    success: function (data) {
                        $('#gnDivisionName').val(data.gn_division_name);
                    },
                    error: function () {
                        alert('Error fetching GN Division Name');
                    }
                });
            }
        }
    </script>

<script>
document.getElementById('add-contribution').addEventListener('click', function () {
     var contributionFields = document.getElementById('contribution-fields');
     var newContributionGroup = document.createElement('div');
     newContributionGroup.className = 'row contribution-group mt-3';
     newContributionGroup.innerHTML = `
         <div class="col-5 form-group">
             <label for="farmer_contribution[]">Farmer Contribution</label>
             <input type="text" name="farmer_contribution[]" class="form-control" required>
         </div>
         <div class="col-5 form-group">
             <label for="cost[]">Cost</label>
             <input type="number" step="0.01" name="cost[]" class="form-control" required>
         </div>
         <div class="col-2">
             <button type="button" class="btn btn-danger remove-contribution-btn">Remove</button>
         </div>
     `;
     contributionFields.appendChild(newContributionGroup);
 });


// Remove farmer contribution and cost from the DOM
$(document).on('click', '.remove-contribution-btn', function() {
    $(this).closest('.contribution-group').remove();
});

// Add Product Details (Total Production, Total Income, Profit)
document.getElementById('add-product').addEventListener('click', function () {
     var productFields = document.getElementById('product-fields');
     var newProductGroup = document.createElement('div');
     newProductGroup.className = 'row product-group mt-3';
     newProductGroup.innerHTML = `
         <div class="col-4 form-group">
             <label for="product_name[]">Product Name</label>
             <input type="text" name="product_name[]" class="form-control" required>
         </div>
         <div class="col-3 form-group">
             <label for="total_production[]">Total Production (kg)</label>
             <input type="number" step="0.01" name="total_production[]" class="form-control" required>
         </div>
         <div class="col-3 form-group">
             <label for="total_income[]">Total Income</label>
             <input type="number" step="0.01" name="total_income[]" class="form-control" required>
         </div>
         <div class="col-2 form-group">
             <label for="profit[]">Profit</label>
             <input type="number" step="0.01" name="profit[]" class="form-control" required>
         </div>
         <div class="col-2">
             <button type="button" class="btn btn-danger remove-product-btn">Remove</button>
         </div>
     `;
     productFields.appendChild(newProductGroup);
 });

       
    

</script>

</body>
</html>
