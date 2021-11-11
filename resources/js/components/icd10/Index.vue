<template>
    <div class="container">
        <h1>ICD-10 CODE SEARCHING SITE</h1>
        <blockquote class="blockquote">
            <p>
                This is where we can search for ICD-10 code 🚨
            </p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Source Title</cite>
        </figcaption>
        <div class="card mt-3">
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
        <div class="card mt-3">
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
        <div class="card mt-3">
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
        <div class="card mt-3">
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
        <div class="card mt-3">
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
        <div class="card mt-3">
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
