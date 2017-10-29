<tr>
                                <td> Nome </td>
                                <td> <input type="text" class="form-control" name="nome" value="<?= $produto->getNome() ?>" /> </td>
                        </tr>
                        <tr> 
                                <td> Preço </td>
                                <td> <input type="number" class="form-control" name="preco" step="0.01" value="<?= $produto->getPreco() ?>" /> </td>
                        </tr>
                        <tr>
                                <td>Descrição</td>
                                <td> <textarea name="descricao" class="form-control" ><?= $produto->getDescricao() ?></textarea> </td>
                        </tr>
                        <?php
                        if ($produto->getUsado() === true) {
                            $usado = 'checked="checked"';
                        }
                        else {
                            $usado = '';
                        }

                        ?>
                        <tr>
                                <td></td>
                                <td><input type="checkbox" name="usado" <?= $usado ?> value="true"> Usado </td>
                        </tr>
                        <tr>
                                <td>Categoria</td>
                                <td>
                                <select name="categoria_id" class="form-control">
                                <?php 
                                foreach ($categorias as $categoria) :
                                    $essaEhACategoria = $produto->getCategoria()->getId() == $categoria->getId();
                                $selecao = $essaEhACategoria ? "selected='selected'" : "";

                                ?>
                                    <option value="<?= $categoria->getId() ?>" <?= $selecao ?>>
                                            <?= $categoria->getNome() ?>
                                    </option>
                                <?php endforeach ?>
                                </select>
                                </td>
                        </tr>
                        <tr>
                                    <td>Tipo do Produto</td>
                                    <td> <select name="tipoProduto" class="form-control">
                                <?php 
                                $tipos = array("Produto", "Livro");

                                foreach ($tipos as $tipo) :
                                    $esseEhOTipo = get_class($produto) == $tipo;
                                $selecao = $esseEhOTipo ? "selected='selected'" : "";
                                ?>
                                    <option value="<?= $tipo ?>" <?= $selecao ?>>
                                            <?= $tipo ?>
                                    </option>
                                <?php endforeach ?>
                                </select>
                                </td> 
                        </tr>
                        <tr> 
                        <td>ISBN (caso seja um livro)</td>
                        <td> 
                            <input type="text" name="isbn" class="form-control" value="<?php if ($produto->temIsbn()) {
                                                                                            echo $produto->getIsbn();
                                                                                        } ?>">
                        </td>
                        </tr>