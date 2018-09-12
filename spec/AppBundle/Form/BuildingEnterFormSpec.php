<?php

namespace spec\AppBundle\Form;

use AppBundle\Form\BuildingEnterForm;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BuildingEnterFormSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BuildingEnterForm::class);
        $this->shouldHaveType(AbstractType::class);
    }

    function it_has_required_configureOptions_method(OptionsResolver $resolver)
    {
        $resolver->setDefaults(Argument::any())->shouldBeCalled();
        $this->configureOptions($resolver);
    }

    function it_has_a_buildForm_method_which_configures_it(FormBuilderInterface $builder)
    {
        $builder->add(Argument::any(), Argument::any(), Argument::any())->willReturn($builder);
        $builder->get(Argument::any())->willReturn($builder);

        $this->buildForm($builder, $options = []);
    }
}
