import "./vendor/bootstrap/js/bootstrap.bundle.js";
import "./vendor/apexcharts/apexcharts.min.js";
import "./vendor/chart.js/chart.umd.js";
import "./vendor/echarts/echarts.min.js";
import "./vendor/quill/quill.min.js";
import "./vendor/simple-datatables/simple-datatables.js";
import "./vendor/tinymce/tinymce.min.js";
import "./vendor/php-email-form/validate.js";

const popoverTriggerList = document.querySelectorAll(
    '[data-bs-toggle="popover"]'
);
const popoverList = [...popoverTriggerList].map(
    (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
);

import "./main.js";
