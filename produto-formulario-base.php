<tr>
                                <td> Nome </td>
                                <td> <input type="text" class="form-control" name="nome" value="<?= $produto['nome'] ?>" /> </td>
                        </tr>
                        <tr> 
                                <td> Preço </td>
                                <td> <input type="number" class="form-control" name="preco" value="<?= $produto['preco'] ?>" /> </td>
                        </tr>
                        <tr>
                                <td>Descrição</td>
                                <td> <textarea name="descricao" class="form-control" ><?= $produto['descricao'] ?></textarea> </td>
                        </tr>
                        <?php
                        if ($produto['usado'] == 0) {
                            $usado = "checked='checked'";
                        }
                        else {
                            $usado = "";
                        }

                        ?>
                        <tr>
                                <td></td>
                                <td><input type="checkbox" name="usado" <?= $usado ?> value="true"> Usado
                        </tr>
                        <tr>
                                <td>Categoria</td>
                                <td>
                                <select name="categoria_id">
                                <?php 
                                foreach ($categorias as $categoria) :
                                    $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
                                $selecao = $essaEhACategoria ? "selected='selected'" : "";

                                ?>
                                    <option value="<?= $categoria['id'] ?>" <?= $selecao ?>>
                                            <?= $categoria['nome'] ?>
                                    </option>
                                <?php endforeach ?>
                                </select>
                                </td>
                        </tr>