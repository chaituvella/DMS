<?php

global $pagebuilder;

if (isset($pagebuilder['settings']['layout-sidebars']) && $pagebuilder['settings']['layout-sidebars'] == "left-sidebar") {
    echo "<div class='left-sidebar-block span3'>
            <aside class='sidebar'>";
                dynamic_sidebar( $pagebuilder['settings']['left-sidebar'] );
    echo "  </aside>
          </div>";
}

?>