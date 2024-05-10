<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overflow Text in Table Column</title>
    <style>
        /* CSS for table and table cells */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            position: relative;
            /* Set position to relative */
            white-space: nowrap;
            /* Prevent text wrapping */
        }

        /* CSS for overflow text */
        .overflow-text {
            position: absolute;
            /* Set position to absolute */
            top: 10%;
            /* Set top position */
            right: 10%;
            /* Set left position */
            transform: translate(5px, -50%);
            /* Adjust position */
            background-color: rgba(255, 255, 255, 0.5);
            /* Background color */
            padding: 5px;
            /* Padding */
        }
    </style>
</head>

<body>

    <h2>Overflow Text in Table Column</h2>

    <table>
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="overflow-text">Another long text that will overflow the table column. Another
                        long text that will overflow the table column. Another long text that will overflow the
                        table column. Another long text that will overflow the table column. Another long text
                        that will overflow the table column.</div>
                </td>
                <td>
                    <div class="overflow-text">
                        <div class="overflow-text"><img src="{{ public_path('storage/images/logo.jpg') }}" alt="logo"
                                style="max-width: 100%; height: 120px;" /></div>
                </td>
            </tr>

        </tbody>
    </table>

</body>

</html>
