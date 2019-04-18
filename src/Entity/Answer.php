<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnswerRepository")
 */
class Answer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $answer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Question", inversedBy="answers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="answers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\LikeAnswer", mappedBy="answers")
     */
    private $likeAnswers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SubAnswer", mappedBy="answer")
     */
    private $subAnswers;

    public function __construct()
    {
        $this->likeAnswers = new ArrayCollection();
        $this->subAnswers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|LikeAnswer[]
     */
    public function getLikeAnswers(): Collection
    {
        return $this->likeAnswers;
    }

    public function addLikeAnswer(LikeAnswer $likeAnswer): self
    {
        if (!$this->likeAnswers->contains($likeAnswer)) {
            $this->likeAnswers[] = $likeAnswer;
            $likeAnswer->addAnswer($this);
        }

        return $this;
    }

    public function removeLikeAnswer(LikeAnswer $likeAnswer): self
    {
        if ($this->likeAnswers->contains($likeAnswer)) {
            $this->likeAnswers->removeElement($likeAnswer);
            $likeAnswer->removeAnswer($this);
        }

        return $this;
    }

    /**
     * @return Collection|SubAnswer[]
     */
    public function getSubAnswers(): Collection
    {
        return $this->subAnswers;
    }

    public function addSubAnswer(SubAnswer $subAnswer): self
    {
        if (!$this->subAnswers->contains($subAnswer)) {
            $this->subAnswers[] = $subAnswer;
            $subAnswer->setAnswer($this);
        }

        return $this;
    }

    public function removeSubAnswer(SubAnswer $subAnswer): self
    {
        if ($this->subAnswers->contains($subAnswer)) {
            $this->subAnswers->removeElement($subAnswer);
            // set the owning side to null (unless already changed)
            if ($subAnswer->getAnswer() === $this) {
                $subAnswer->setAnswer(null);
            }
        }

        return $this;
    }
}
