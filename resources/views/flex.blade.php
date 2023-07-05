<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flex</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div>
            <div class="d-flex flex-sm-row flex-column justify-content-between">
                <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-primary mr-2">Add</button>
                    <button type="button" class="btn btn-secondary mr-2">Import</button>
                    <button type="button" class="btn btn-success mr-2">Export</button>
                </div>
                <div class="d-flex mr-2 justify-content-center align-items-center">
                    <div class="p-2">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <div class="p-2">
                        <select name="year" class="form-control">
                            <option value="">Pilih Tahun</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
      </div>
</body>
</html>