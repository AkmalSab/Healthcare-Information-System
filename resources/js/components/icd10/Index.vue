<template>
    <div class="container">
        <h1>ICD-10 CODE</h1>
        <blockquote class="blockquote">
            <p>
                Standard transaction code set for diagnostic purposes
            </p>
        </blockquote>
        <figcaption class="blockquote-footer">
            International Statistical Classification of Diseases and Related Health Problems <cite title="Source Title">(ICD)</cite>
        </figcaption>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <!-- tab lists -->
                <button class="nav-link active" id="nav-blocks-tab" data-bs-toggle="tab" data-bs-target="#icd-blocks" type="button" role="tab" aria-controls="nav-blocks" aria-selected="true">ICD Blocks</button>
                <button class="nav-link" id="nav-chapters-tab" data-bs-toggle="tab" data-bs-target="#icd-chapters" type="button" role="tab" aria-controls="nav-chapters" aria-selected="false">ICD Chapters</button>
                <button class="nav-link" id="nav-codes-tab" data-bs-toggle="tab" data-bs-target="#icd-codes" type="button" role="tab" aria-controls="nav-codes" aria-selected="false">ICD Codes</button>
                <button class="nav-link" id="nav-raw-tab" data-bs-toggle="tab" data-bs-target="#icd-raw" type="button" role="tab" aria-controls="nav-raw" aria-selected="false">ICD Raw</button>
                <button class="nav-link" id="nav-report-tab" data-bs-toggle="tab" data-bs-target="#icd-report" type="button" role="tab" aria-controls="nav-report" aria-selected="false">ICD Report</button>
                <button class="nav-link" id="nav-map-tab" data-bs-toggle="tab" data-bs-target="#icd-map" type="button" role="tab" aria-controls="nav-map" aria-selected="false">ICD Map</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="icd-blocks" role="tabpanel" aria-labelledby="nav-blocks-tab">
                <!-- icd blocks -->
                <div class="card mt-3">
                    <div class="card-header">
                        <strong>ICD Blocks</strong>
                    </div>
                    <div class="card-body">
                        <table class="table" id="icdblocksTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ID2</th>
                                    <th scope="col">IDC</th>
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="blocks in icdBlocks" :key="blocks.id">
                                    <th scope="row">{{ blocks.Id }}</th>
                                    <td>{{ blocks.id2 }}</td>
                                    <td>{{ blocks.idc }}</td>
                                    <td>{{ blocks.name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="icd-chapters" role="tabpanel" aria-labelledby="nav-chapters-tab">
                <!-- icd chapters -->
                <div class="card mt-3">
                    <div class="card-header">
                        <strong>ICD Chapters</strong>
                    </div>
                    <div class="card-body">
                        <table class="table" id="icdchaptersTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="chapters in icdChapters" :key="chapters.id">
                                    <th scope="row">{{ chapters.Id }}</th>
                                    <td>{{ chapters.name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="icd-codes" role="tabpanel" aria-labelledby="nav-codes-tab">
                <!-- icd codes -->
                <div class="card mt-3">
                    <div class="card-header">
                        <strong>ICD Codes</strong>
                    </div>
                    <div class="card-body">
                        <table class="table" id="icdcodesTable">
                            <thead>
                                <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Chapter</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Digit</th>
                                    <th scope="col">Class</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="codes in icdCodes" :key="codes.id">
                                    <th scope="row">{{ codes.icd10_code }}</th>
                                    <td>{{ codes.icd10_chapter }}</td>
                                    <td>{{ codes.icd10_block }}</td>
                                    <td>{{ codes.icd10_desc }}</td>
                                    <td>{{ codes.icd10_digit }}</td>
                                    <td>{{ codes.icd10_class }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="icd-raw" role="tabpanel" aria-labelledby="nav-raw-tab">
                <!-- icd raw -->
                <div class="card mt-3">
                    <div class="card-header">
                        <strong>ICD Raw</strong>
                    </div>
                    <div class="card-body">
                        <table class="table" id="icdrawTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ID2</th>
                                    <th scope="col">ID3</th>
                                    <th scope="col">IDC</th>
                                    <th scope="col">IDB</th>
                                    <th scope="col">ID7</th>
                                    <th scope="col">ID8</th>
                                    <th scope="col">ID9</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">MORT</th>
                                    <th scope="col">MORT2</th>
                                    <th scope="col">MORT3</th>
                                    <th scope="col">MORT4</th>
                                    <th scope="col">MORT5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="raw in icdRaw" :key="raw.id">
                                    <th scope="row">{{ raw.Id }}</th>
                                    <td>{{ raw.id2 }}</td>
                                    <td>{{ raw.id3 }}</td>
                                    <td>{{ raw.idc }}</td>
                                    <td>{{ raw.idb }}</td>
                                    <td>{{ raw.id7 }}</td>
                                    <td>{{ raw.id8 }}</td>
                                    <td>{{ raw.id9 }}</td>
                                    <td>{{ raw.name }}</td>
                                    <td>{{ raw.mort1 }}</td>
                                    <td>{{ raw.mort2 }}</td>
                                    <td>{{ raw.mort3 }}</td>
                                    <td>{{ raw.mort4 }}</td>
                                    <td>{{ raw.mort5 }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="icd-report" role="tabpanel" aria-labelledby="nav-report-tab">
                <!-- icd report -->
                <div class="card mt-3">
                    <div class="card-header">
                        <strong>ICD Report</strong>
                    </div>
                    <div class="card-body">
                        <table class="table" id="icdreportTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Chapter</th>
                                    <th scope="col">Chapt Desc</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Block Desc</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Code Desc</th>
                                    <th scope="col">No.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="report in icdReport" :key="report.id">
                                    <th scope="row">{{ report.report_id }}</th>
                                    <td>{{ report.report_year }}</td>
                                    <td>{{ report.report_month }}</td>
                                    <td>{{ report.report_day }}</td>
                                    <td>{{ report.report_chapter }}</td>
                                    <td>{{ report.report_chapterdesc }}</td>
                                    <td>{{ report.report_block }}</td>
                                    <td>{{ report.report_blockdesc }}</td>
                                    <td>{{ report.report_code }}</td>
                                    <td>{{ report.report_codedesc }}</td>
                                    <td>{{ report.report_num }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="icd-map" role="tabpanel" aria-labelledby="nav-map-tab">
                <!-- icd map -->
                <div class="card mt-3">
                    <div class="card-header">
                        <strong>ICD Map</strong>
                    </div>
                    <div class="card-body">
                        <table class="table" id="icdmapTable">
                            <thead>
                                <tr>
                                    <th scope="col">IDR</th>
                                    <th scope="col">IDC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="map in icdMap" :key="map.id">
                                    <th scope="row">{{ map.idr }}</th>
                                    <td>{{ map.idc }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>             
    </div>
</template>

<script>
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";

export default {
    data() {
        return {
            icdBlocks: [],
            icdChapters: [],
            icdCodes: [],
            icdMap: [],
            icdRaw: [],
            icdReport: []
        };
    },
    created() {
        this.getICDBlocks()
        this.getICDChapters()
        this.getICDCodes()
        this.getICDRaw()
        this.getICDReport()
        this.getICDMap()
    },
    methods: {
        getICDBlocks() {
            axios
                .get("/api/icd10/blocks")
                .then(res => {
                    this.icdBlocks = res.data;
                    this.$nextTick(() => {
                        $("#icdblocksTable").DataTable();
                    });
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        getICDChapters() {
            axios
                .get("/api/icd10/chapters")
                .then(res => {
                    this.icdChapters = res.data;
                    this.$nextTick(() => {
                        $("#icdchaptersTable").DataTable();
                    });
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        getICDCodes() {
            axios
                .get("/api/icd10/codes")
                .then(res => {
                    this.icdCodes = res.data;
                    this.$nextTick(() => {
                        $("#icdcodesTable").DataTable();
                    });
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        getICDRaw() {
            axios
                .get("/api/icd10/raw")
                .then(res => {
                    this.icdRaw = res.data;
                    this.$nextTick(() => {
                        $("#icdrawTable").DataTable();
                    });
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        getICDReport() {
            axios
                .get("/api/icd10/report")
                .then(res => {
                    this.icdReport = res.data;
                    this.$nextTick(() => {
                        $("#icdreportTable").DataTable();
                    });
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        getICDMap() {
            axios
                .get("/api/icd10/map")
                .then(res => {
                    this.icdMap = res.data;
                    this.$nextTick(() => {
                        $("#icdmapTable").DataTable();
                    });
                })
                .catch(error => {
                    console.log(console.error());
                });
        }
    }
};
</script>

<style></style>
