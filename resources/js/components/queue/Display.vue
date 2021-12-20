<template>
  <div class="container">
    <h1>TEST DISPLAY QUEUE</h1>
    <div class="card">
      <div class="card-body">
        <h1>Current Queue</h1>
        <p class="display-6">
            {{ latestQueue.name }}
        </p>
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
export default {
  data() {
    return {
      allQueues: [],
      latestQueue: [],
    };
  },
  created() {
    this.getAllQueues();
    this.getLatestQueue();
  },
  methods: {
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
  },
};
</script>

<style>
</style>