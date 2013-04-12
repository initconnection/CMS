  <aside>
    <h2>Recent <span>News</span></h2>
    <!-- .news -->
    <ul class="news">
      <?php foreach ($this->news as $article): ?>
      <li>
        <figure><strong><?=getDay($article["date"])?></strong><?=getMonthName($article["date"])?></figure>
        <h3><a href="<?=ABSOLUTE_PATH?>home/<?=$article["name"]?>"><?=$article["heading"]?></a></h3>
        <?=$article["content"]?>
      </li>
      <?php endforeach ?>
    </ul>
    <!-- /.news -->
  </aside>
  <!-- content -->
  <section id="content">
    <article>
      <?=$this->content?>
    </article> 
  </section>
