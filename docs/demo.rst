.. _demo:

Try a conversion
================

.. meta::
   :description: Convert a coordinate in the browser with PHPCoord. Choose two coordinate reference systems and enter a coordinate.

This page runs PHPCoord in your browser. Choose a source and a target coordinate reference system, enter a coordinate and the page shows the result and the route ``convert()`` took as described in :ref:`the easy way<coordinate_conversions_easy>`.

.. raw:: html

    <div id="playground"></div>
    <script>
        (function () {
            var loader = document.createElement("script");
            loader.type = "module";
            loader.src = "_static/js/playground.js?v=20";
            document.currentScript.parentNode.appendChild(loader);
        })();
    </script>
