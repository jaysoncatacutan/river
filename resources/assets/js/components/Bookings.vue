<template>
    <div>
        <b-row>
            <div class="header">
                <h4>Make a Booking</h4>
            </div>

            <form @submit.prevent="addBooking" class="form-booking">
                <div class="form-group" style="display:inline-table">
                    <b-row md="12">
                        <b-col md="3"> Your name: </b-col>
                        <b-col md="9">
                            <input type="text" class="form-control" v-model="booking.guest">
                        </b-col>
                    </b-row>
                </div>
                <div class="form-group">
                    <b-row md="12">
                        <b-col md="3"> Your Dates: </b-col>
                        <b-col md="9">
                            <input type="date" class="form-control" format="yyyy-mm-dd" v-model="booking.from_date">
                            <input type="date" class="form-control" format="yyyy-mm-dd" v-model="booking.to_date">
                        </b-col>
                    </b-row>
                </div>
                <div class="form-group" style="display:inline-table">
                    <b-row md="12">
                        <b-col md="3"> Your Message: </b-col>
                        <b-col md="9">
                            <textarea class="form-control" v-model="booking.message"></textarea>
                        </b-col>
                    </b-row>
                </div>

                <b-row md="12">
                    <b-col md="9"></b-col>
                    <b-col md="3">
                        <button type="submit" class="btn btn-block place-booking-btn">Place Booking</button>
                    </b-col>
                </b-row>

            </form>
        </b-row>

        <b-row>
            <div class="header">
                <h4>Booking List</h4>
            </div>
            <b-table :id="booking-list" hover :items="bookings" :fields="fields"
                :current-page="currentPage"
                :per-page="perPage">
            </b-table>
            <b-row>
                <b-col md="6" class="my-1">
                    <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0" />
                </b-col>
            </b-row>

        </b-row>

    </div>
</template>

<script>
export default {
  data() {
    return {
      time3: "",
      shortcuts: [
        {
          text: "Today",
          onClick: () => {
            console.log("clicked");
            this.time3 = [new Date(), new Date()];
          }
        }
      ],
      fields: {
        id: "#",
        guest: "Guest",
        from_date: "Booking from",
        to_date: "Booking until",
        message: "Remarks"
      },
      combine: () => {},
      bookings: [],
      currentPage: 1,
      perPage: 5,
      totalRows: 0,
      booking: {
        guest: "",
        message: "",
        from_date: "",
        to_date: ""
      },
      booking_id: "",
      pagination: {},
      edit: false
    };
  },
  created() {
    this.fetchBookings();
  },

  methods: {
    fetchBookings() {
      fetch("api/bookings")
        .then(res => res.json())
        .then(res => {
          this.bookings = res.data;
          this.totalRows = res.data.length;
        });
    },
    addBooking(){
        const me = this;

        fetch('api/booking', {
                method: 'post',
                headers: {
                    'content-type': 'application/json'
                },
                body: JSON.stringify(me.booking),
            })
            .then(res => res.json)
            .then(data => {
                me.fetchBookings();

                me.booking.guest = "";
                me.booking.from_date = "";
                me.booking.to_date = "";
                me.booking.message = "";
            })
    }
  }
};
</script>

<style>
.place-booking-btn{
    border: 3px solid skyblue;
    color: skyblue;
}
.header {
  width: 100%;
  text-align: center;
  margin-top: 20px;
  color: #5db9dc;
}
.booking-list {
  color: silver;
}
.form-booking{
    width: 80%;
    margin: 0 auto;
    display: inline-grid;
}
</style>
