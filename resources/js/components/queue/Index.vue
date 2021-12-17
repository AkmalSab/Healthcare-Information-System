<template>
  <div class="container">
    <h1>Create Queue</h1>
    <blockquote class="blockquote">
      <p>Queue registration system.</p>
    </blockquote>
    <figcaption class="blockquote-footer">
      Someone famous in <cite title="Source Title">Wan-Bissaka</cite>
    </figcaption>
    <div v-if="showMessage" class="alert alert-success">
      {{ message }}
    </div>

    <div class="card">
      <div class="card-body">
        <form @submit.prevent="storeQueue">
          <div class="row">
            <div class="col">
              <label>Select Patient</label>
              <v-select
                class="mt-2"
                :options="patientArr"
                label="name"
                v-model="selectedPatient"
              ></v-select>
            </div>
            <div class="col">
              <label>Current Queue</label>
              <h1>
                {{ latestQueue.name }}
                <span
                  class="
                    position-absolute
                    top-0
                    start-100
                    translate-middle
                    badge
                    rounded-pill
                    bg-danger
                  "
                >
                  {{ latestQueue.queue_no }}
                </span>
              </h1>
            </div>
          </div>
          <button
            type="submit"
            class="btn btn-primary w-100 mt-2"
            style="color: white"
          >
            Submit
          </button>
        </form>
      </div>
    </div>

    <div class="card text-center mt-2">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Patient Name</th>
              <th scope="col">Queue No.</th>
              <th scope="col">Created</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="q in allQueues" :key="q.id">
              <td>{{ q.patient.name }}</td>
              <td>{{ q.queue_no }}</td>
              <td>{{ q.created_at | formatDate }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import "vue-select/dist/vue-select.css";

export default {
  data() {
    return {
      showMessage: false,
      message: "",
      patientArr: [],
      selectedPatient: "",
      allQueues: [],
      latestQueue: [],
    };
  },
  created() {
    this.getPatient();
    this.getAllQueues();
    this.getLatestQueue();
  },
  methods: {
    getPatient() {
      axios
        .get("/api/patient")
        .then((res) => {
          this.patientArr = res.data.data;
        })
        .catch((error) => {
          console.log(console.error());
        });
    },
    getAllQueues() {
      axios
        .get("/api/queue")
        .then((res) => {
          this.allQueues = res.data.data;
        })
        .catch((error) => {
          console.log(console.error());
        });

        setTimeout(this.getLatestQueue, 5000);
        setTimeout(this.getAllQueues, 5000);
    },
    getLatestQueue() {
      axios
        .get("/api/fetch-latest-queue")
        .then((res) => {
          this.latestQueue = res.data;
        })
        .catch((error) => {
          console.log(console.error());
        });
    },
    storeQueue() {
      axios
        .post("/api/queue", {
          queueData: JSON.stringify(this.selectedPatient),
        })
        .then((res) => {
          this.showMessage = true;
          this.message = "Successfull 💥";
          this.getPatient();
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
  },
};
</script>

<style>
</style>
