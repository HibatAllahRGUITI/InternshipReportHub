<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stage Hub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="STYLES/home_etudiant.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand">Consultation</a>
                <form class="d-flex" role="search" method="get">
                    <select class="form-select me-2" aria-label="Filière" name="filiere">
                        <option value="">Toutes les filières</option>
                        <option value="Informatique">Informatique</option>
                        <option value="Finance">Finance</option>
                        <option value="Indus">Indus</option>
                        <option value="Electrique">Electrique</option>
                        <option value="Mecanique">Mécanique</option>
                        <option value="BTP">BTP</option>
                        <option value="gee">gee</option>
                    </select>
                    <select class="form-select me-2" aria-label="Année" name="niveau">
                        <option value="">Tous les niveaux</option>
                        <option value="1annee">1er Année</option>
                        <option value="2annee">2eme Année</option>
                        <option value="3annee">3eme Année</option>
                    </select>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                    <button class="btn" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
    <main>
        <div class="container my-5">
            <h1>Listes des rapports de Stage</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre du rapport</th>
                        <th>Description du rapport</th>
                        <th>Nom de la filière</th>
                        <th>Niveau</th>
                        <th>Date de dépot</th>
                        <th>Télécharger</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "CONFIGURATION/connexion.php";

                    $sql = "SELECT rs.titre_rapport, rs.description_rapport, f.Nom_filiere, n.Nom_niveau, rs.date_dépot, rs.chemin_fichier
                            FROM rapports_stage rs
                            INNER JOIN rapports_etudiant re ON rs.ID_rapport = re.ID_rapport
                            INNER JOIN etudiant e ON re.ID_etudiant = e.ID_etudiant
                            INNER JOIN filiere f ON e.ID_filiere = f.ID_filiere
                            INNER JOIN niveau n ON e.ID_niveau = n.ID_niveau
                            WHERE 1"; 

                    if (isset($_GET['filiere']) && !empty($_GET['filiere'])) {
                        $filiere = $_GET['filiere'];
                        $sql .= " AND f.Nom_filiere = '$filiere'";
                    }

                    if (isset($_GET['niveau']) && !empty($_GET['niveau'])) {
                        $niveau = $_GET['niveau'];
                        $sql .= " AND n.Nom_niveau = '$niveau'";
                    }

                    if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
                        $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
                        $sql .= " AND (rs.titre_rapport LIKE '%$keyword%' OR rs.description_rapport LIKE '%$keyword%' OR rs.date_dépot LIKE '%$keyword%')";
                    }

                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $file_path = $row["chemin_fichier"];
                            echo "<tr>";
                            echo "<td>" . $row["titre_rapport"] . "</td>";
                            echo "<td>" . $row["description_rapport"] . "</td>";
                            echo "<td>" . $row["Nom_filiere"] . "</td>";
                            echo "<td>" . $row["Nom_niveau"] . "</td>";
                            echo "<td>" . $row["date_dépot"] . "</td>";
                            echo "<td><a href='$file_path'>Télécharger</a></td>"; 
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Aucun rapport de stage trouvé.</td></tr>";
                    }
                    mysqli_close($conn);
                ?>
                </tbody>
            </table>
        </div> 
    </main>
    <footer>
        <p>&copy; 2024 - ENSA Agadir</p>
    </footer>
</body>
</html>
