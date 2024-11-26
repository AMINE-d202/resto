<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales Report</title>
    <style>
        /* Add any custom styles for your PDF here */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            vertical-align: top; /* Align content at the top of cells */
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Sales Report</h1>
    <p>Rapport de {{ $from }} à {{ $to }}</p>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Menus</th>
                <th>Tables</th>
                <th>Sérveur</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Type de paiement</th>
                <th>Etat de paiement</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>
                    @foreach($sale->menus()->where("sales_id",$sale->id)->get() as $menu)
                    <h5>{{ $menu->title }}</h5>
                    <h5>{{ $menu->price }} DH</h5>
                    @endforeach
                </td>
                <td>
                    @foreach($sale->tables()->where("sales_id",$sale->id)->get() as $table)
                    <h5>{{ $table->name }}</h5>
                    @endforeach
                </td>
                <td>{{ $sale->servant->name }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>{{ $sale->total_received }}</td>
                <td>{{ $sale->payment_type === "cash" ? "Espèce" : "Carte bancaire" }}</td>
                <td>{{ $sale->payment_status === "paid" ? "Payé" : "Impayé" }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="5"><strong>Total:</strong></td>
                <td>{{ $total }} DH</td>
                <td colspan="2"></td> <!-- Colspan to fill remaining cells -->
            </tr>
        </tbody>
    </table>
</body>
</html>
