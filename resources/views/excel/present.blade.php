<table>
    <thead>
    <th>Nom</th>
    <th>Prénom</th>
    <th>CIN</th>
    <th>Signautre</th>
    </thead>
    <tbody>
    @foreach($etudiants as $et)
        <tr>
            <td>{{$et["{$alias}nom"]}}</td>
            <td>{{$et["{$alias}prenom"]}}</td>
            <td>{{$et["{$alias}cin"]}}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
