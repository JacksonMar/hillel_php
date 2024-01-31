<?php

require_once "TaskState.php";

class TaskManager
{
    private string $filePath;
    private array $tasks = [];

    public function __construct(string $filePath)
    {
        $this->setFilePath($filePath);
        if (!file_exists($this->getFilePath())) {
            $this->saveTasks();
        }
    }

    public function addTask(string $taskName, int $priority): void
    {
        $taskId = uniqid();
        $task = [
            'id' => $taskId,
            'name' => $taskName,
            'priority' => $priority,
            'status' => TaskState::NOT_DONE,
        ];

        $this->tasks[] = $task;
        $this->saveTasks();
    }

    public function deleteTask(string $taskId): void
    {
        foreach ($this->tasks as $key => $task) {
            if ($task['id'] === $taskId) {
                unset($this->tasks[$key]);
                $this->saveTasks();
                break;
            }
        }
    }

    public function getTasks(): array
    {
        usort($this->tasks, fn($a, $b) => $b['priority'] - $a['priority']);
        return $this->tasks;
    }

    public function completeTask(string $taskId): void
    {
        foreach ($this->tasks as &$task) {
            if ($task['id'] === $taskId) {
                $task['status'] = TaskState::DONE;
                $this->saveTasks();
                break;
            }
        }
    }

    private function saveTasks(): void
    {
        $tasksJson = json_encode($this->tasks, JSON_PRETTY_PRINT);
        file_put_contents($this->getFilePath(), $tasksJson);
    }

    private function loadTasks(): void
    {
        $tasksJson = file_get_contents($this->getFilePath());
        $this->tasks = json_decode($tasksJson, true) ?: [];
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
        $this->loadTasks();
    }
}