<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert ;
use App\Entity\Event ;

class Contact {
    /**
    * @var string|null
    * @Assert\NotBlank()
    * @Assert\Length(min=2 , max=100)
    */
    private $firstname ;

    /**
    * @var string|null
    * @Assert\NotBlank()
    * @Assert\Length(min=2 , max=100)
    */
    private $lastname ;

    /**
    * @var string|null
    * @Assert\NotBlank()
    * @Assert\Regex(
    * pattern="/[0-9]{8}/"
    * )
    */
    private $phone ;

    /**
    * @var string|null
    * @Assert\NotBlank()
    * @Assert\Email()
    */
    private $email ;

    /**
    * @var string|null
    * @Assert\NotBlank()
    * @Assert\Length(min=10)
    */
    private $message ;
    /**
    * @var Event|null
    */
    private $event;

        public function getFirstname(): ?string
        {
            return $this->firstname;
        }

        public function setFirstname(string $firstname): Contact
        {
            $this->firstname = $firstname;

            return $this;
        }

        public function getLastname(): ?string
        {
            return $this->lastname;
        }

        public function setLastname(string $lastname): Contact
        {
            $this->lastname = $lastname;

            return $this;
        }
        public function getPhone(): ?string
         {
             return $this->phone;
         }

         public function setPhone(string $phone): Contact
         {
             $this->phone = $phone;

             return $this;
         }
        public function getEmail(): ?string
        {
            return $this->email;
        }

        public function setEmail(string $email): Contact
        {
            $this->email = $email;

            return $this;
        }
        public function getMessage(): ?string
        {
            return $this->message;
        }

        public function setMessage(string $message): Contact
        {
            $this->message = $message;

            return $this;
        }

        public function getEvent(): ?Event
        {
            return $this->event;
        }

        public function setEvent(Event $event): Contact
        {
            $this->event = $event;

            return $this;
        }


}