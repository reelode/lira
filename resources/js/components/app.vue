<template>
  <div
    class="min-h-screen w-screen bg-gray-200 flex items-center justify-center"
  >
    <section v-if="errored">
      <p>
        We're sorry, we're not able to retrieve this information at the moment,
        please try back later
      </p>
    </section>

    <section v-else>
      <div v-if="loading">Loading...</div>

      <draggable
        tag="ul"
        ghost-class="moving-card"
        class="w-full max-w-md"
        :list="todos"
        :animation="200"
        @change="update"
      >
        <li
          v-for="(todo, index) in orderedTodos"
          :key="index"
          class="p-4 mb-3 flex justify-between items-center bg-white shadow rounded-lg cursor-move"
        >
          {{ todo.title }}

          <!-- <EditIcon /><Trash2Icon /> -->
        </li>
      </draggable>
    </section>
  </div>
</template>

<script>
import { EditIcon, Trash2Icon } from "vue-feather-icons";
import Draggable from "vuedraggable";
export default {
  name: "todo-app",
  components: {
    EditIcon,
    Trash2Icon,
    Draggable,
  },

  data() {
    return {
      todos: [],
      debounce: false,
      loading: true,
      errored: false,
    };
  },

  methods: {
    update() {
      this.todos.map((todo, index) => {
        todo.order = index + 1;
      });
      axios.post("/todos/updateAll", {
        todos: this.todos,
      });
    },
  },

  mounted() {
    axios
      .get("/todos")
      .then((response) => {
        this.todos = response.data.data;
        console.log(this.todos);
      })
      .catch((error) => {
        console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
  },
  computed: {
    orderedTodos: function () {
      return _.orderBy(this.todos, "order");
    },
  },
};
</script>