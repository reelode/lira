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
        filter=".action-button"
        class="w-full max-w-md"
        :list="todos"
        :animation="200"
      >
        <li
          v-for="todo in todos"
          :key="todo.id"
          class="p-4 mb-3 flex justify-between items-center bg-white shadow rounded-lg cursor-move"
        >
          {{ todo.title }} <br />
          <EditIcon /><Trash2Icon />
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
      loading: true,
      errored: false,
    };
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
};
</script>