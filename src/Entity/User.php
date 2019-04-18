<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="user_login_unique", columns={"login"}),
 *      @ORM\UniqueConstraint(name="user_nickname_unique", columns={"nickname"})
 * })
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nickname;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="user")
     */
    private $comments;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\LikeComment", mappedBy="users")
     */
    private $likeComments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Answer", mappedBy="user")
     */
    private $answers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\LikeAnswer", mappedBy="users")
     */
    private $likeAnswers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SubAnswer", mappedBy="user")
     */
    private $subAnswers;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->likeComments = new ArrayCollection();
        $this->answers = new ArrayCollection();
        $this->likeAnswers = new ArrayCollection();
        $this->subAnswers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LikeComment[]
     */
    public function getLikeComments(): Collection
    {
        return $this->likeComments;
    }

    public function addLikeComment(LikeComment $likeComment): self
    {
        if (!$this->likeComments->contains($likeComment)) {
            $this->likeComments[] = $likeComment;
            $likeComment->addUser($this);
        }

        return $this;
    }

    public function removeLikeComment(LikeComment $likeComment): self
    {
        if ($this->likeComments->contains($likeComment)) {
            $this->likeComments->removeElement($likeComment);
            $likeComment->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Answer[]
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setUser($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->contains($answer)) {
            $this->answers->removeElement($answer);
            // set the owning side to null (unless already changed)
            if ($answer->getUser() === $this) {
                $answer->setUser(null);
            }
        }

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
            $likeAnswer->addUser($this);
        }

        return $this;
    }

    public function removeLikeAnswer(LikeAnswer $likeAnswer): self
    {
        if ($this->likeAnswers->contains($likeAnswer)) {
            $this->likeAnswers->removeElement($likeAnswer);
            $likeAnswer->removeUser($this);
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
            $subAnswer->setUser($this);
        }

        return $this;
    }

    public function removeSubAnswer(SubAnswer $subAnswer): self
    {
        if ($this->subAnswers->contains($subAnswer)) {
            $this->subAnswers->removeElement($subAnswer);
            // set the owning side to null (unless already changed)
            if ($subAnswer->getUser() === $this) {
                $subAnswer->setUser(null);
            }
        }

        return $this;
    }
}
