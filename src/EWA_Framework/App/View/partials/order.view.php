<h2>Pizza-Bestellung</h2>

<form action="index.php" method="post">
    <fieldset>
        <legend>Wählen Sie Ihre Pizza:</legend>
        
        <?php
        if (isset($data) && is_array($data)) { 
            foreach ($data as $article) {
                
                $id = htmlspecialchars($article['article_id']);
                $name = htmlspecialchars($article['name']);
                
                $price = htmlspecialchars(number_format($article['price'], 2, ',', '.'));
                
                echo '<label>';
                echo '<input type="radio" name="pizza_id" value="' . $id . '" ' . 
                     (($id == 1) ? 'checked' : '') . ' required> ' . 
                     $name . ' (' . $price . ' €)';
                echo '</label><br>';
            }
        }
        ?>
    </fieldset>

    <label for="amount">Anzahl:</label>
    <select name="amount" id="amount">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
    
    <label for="address">Lieferadresse:</label>
    <textarea id="address" name="address" required></textarea>

    <button type="submit" name="submit_order">Bestellung abschicken</button>
</form>